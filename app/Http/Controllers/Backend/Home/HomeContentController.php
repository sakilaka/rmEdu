<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\HomeContentItem;
use App\Models\HomeContentSetup;
use App\Models\HomeContentLocation;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Continent;
use App\Models\Country;
use App\Models\FooterImage;
use App\Models\State;

class HomeContentController extends Controller
{
    function getHomeContect()
    {
        $data['home_content'] = HomeContentSetup::FirstorNew();
        $data['faqs'] =  Faq::where('type', "homepage")->get();
        $data['learn_texts'] =  HomeContentItem::where('type', "homepage")->get();
        $data['home_content_locations'] =  HomeContentLocation::get();
        $data['continents'] = Continent::get();
        $data['countrys'] = Country::get();
        $data['states']  = State::get();
        $data['citys']  = City::get();

        $footerImageRecord = FooterImage::orderBy('id', 'desc')->first();
        if ($footerImageRecord) {
            $footerImageValue = $footerImageRecord->value('footer_image');
            $data['footer_images'] = json_decode($footerImageValue);
        } else {
            $data['footer_images'] = [];
        }

        return view("Backend.home.content_setup.index", $data);
    }


    public function setBannerSection(Request $request)
    {
        if ($request->home_content_old_ques) {
            foreach ($request->home_content_old_ques as $key => $value) {
                $faq = Faq::find($key);
                $faq->question = $value;
                $faq->answer = $request->home_content_old_ans[$key];
                $faq->type = "homepage";
                $faq->save();
            }
        }
        if ($request->old_delete_faq_data) {
            foreach ($request->old_delete_faq_data as $value) {
                $faq = Faq::find($value);
                $faq->delete();
            }
        }
        if ($request->home_content_ques) {
            foreach ($request->home_content_ques as $key => $value) {
                $faq = new Faq;
                $faq->question = $value;
                $faq->answer = $request->home_content_ans[$key];
                $faq->type = "homepage";
                $faq->save();
            }
        }

        $home_content = HomeContentSetup::first();
        if ($home_content == null) {
            $home_content = new HomeContentSetup;
        }
        $home_content->banner_text = $request->banner_text;

        if ($request->hasFile('banner_image')) {
            @unlink(public_path('upload/home_content/' . $home_content->banner_image));
            $fileName = time() . '_banner-image.' . $request->banner_image->getClientOriginalExtension();
            $request->banner_image->move(public_path('upload/home_content'), $fileName);

            $home_content->banner_image = $fileName;
        }
        if ($request->hasFile('banner_video')) {
            @unlink(public_path('upload/home_content/' . $home_content->banner_video));
            $fileName = time() . '_banner_video.' . $request->banner_video->getClientOriginalExtension();
            $request->banner_video->move(public_path('upload/home_content'), $fileName);

            $home_content->banner_video = $fileName;
        }
        $home_content->save();
        return redirect()->back()->with('success', 'Banner Section Update Successfully');
    }

    public function setHeroSliderSection(Request $request)
    {
        try {
            $home_content = HomeContentSetup::first();
            if ($home_content == null) {
                $home_content = new HomeContentSetup;
            }

            $home_content->hero_slider_title_1 = $request->hero_slider_title_1;
            $home_content->hero_slider_title_2 = $request->hero_slider_title_2;

            $hero_slider_btn_text_1 = [
                'hero_slider_btn_text_1_first' => $request->hero_slider_btn_text_1_first,
                'hero_slider_btn_url_1_first' => $request->hero_slider_btn_url_1_first,
                'hero_slider_btn_text_1_second' => $request->hero_slider_btn_text_1_second,
                'hero_slider_btn_url_1_second' => $request->hero_slider_btn_url_1_second,
            ];
            $home_content->hero_slider_btn_text_1 = json_encode($hero_slider_btn_text_1);

            $hero_slider_btn_text_2 = [
                'hero_slider_btn_text_2_first' => $request->hero_slider_btn_text_2_first,
                'hero_slider_btn_url_2_first' => $request->hero_slider_btn_url_2_first,
                'hero_slider_btn_text_2_second' => $request->hero_slider_btn_text_2_second,
                'hero_slider_btn_url_2_second' => $request->hero_slider_btn_url_2_second,
            ];
            $home_content->hero_slider_btn_text_2 = json_encode($hero_slider_btn_text_2);

            if ($request->hasFile('hero_slider_bg_1')) {
                @unlink(public_path('upload/home_content/hero_slider/' . $home_content->hero_slider_bg_1));
                $fileName = mt_rand(1111, 9999) . '_hero_slider_image.' . $request->hero_slider_bg_1->getClientOriginalExtension();
                $request->hero_slider_bg_1->move(public_path('upload/home_content/hero_slider'), $fileName);
                $home_content->hero_slider_bg_1 = $fileName;
            }

            if ($request->hasFile('hero_slider_bg_2')) {
                @unlink(public_path('upload/home_content/hero_slider/' . $home_content->hero_slider_bg_2));
                $fileName = mt_rand(1111, 9999) . '_hero_slider_image.' . $request->hero_slider_bg_2->getClientOriginalExtension();
                $request->hero_slider_bg_2->move(public_path('upload/home_content/hero_slider'), $fileName);
                $home_content->hero_slider_bg_2 = $fileName;
            }

            $home_content->save();

            return redirect()->back()->with('success', 'Hero Slider Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'Something Went Wrong!');
        }
    }

    public function setSubBannerSection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if ($home_content == null) {
            $home_content = new HomeContentSetup;
        }

        $home_content->sub_banner_title = $request->sub_banner_title;
        $home_content->sub_banner_video = $request->sub_banner_video; //video URL

        if ($request->hasFile('sub_banner_image')) {
            @unlink(public_path('upload/home_content/' . $home_content->sub_banner_image));
            $fileName = time() . '_sub_banner_image.' . $request->sub_banner_image->getClientOriginalExtension();
            $request->sub_banner_image->move(public_path('upload/home_content'), $fileName);
            $home_content->sub_banner_image = $fileName;
        }
        if ($request->hasFile('sub_banner_thumbnail')) {
            @unlink(public_path('upload/home_content/' . $home_content->sub_banner_thumbnail));
            $fileName = time() . '_sub_banner_thumbnail-logo.' . $request->sub_banner_thumbnail->getClientOriginalExtension();
            $request->sub_banner_thumbnail->move(public_path('upload/home_content'), $fileName);
            $home_content->sub_banner_thumbnail = $fileName;
        }
        $home_content->save();
        return redirect()->back()->with('success', 'Sub Banner Section Update Successfully');
    }

    public function setUniversitySection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if ($home_content == null) {
            $home_content = new HomeContentSetup;
        }

        $home_content->university_title = $request->sub_banner_title;

        if ($request->hasFile('university_image')) {
            @unlink(public_path('upload/home_content/' . $home_content->university_image));
            $fileName = time() . '_university_image.' . $request->university_image->getClientOriginalExtension();
            $request->university_image->move(public_path('upload/home_content'), $fileName);
            $home_content->university_image = $fileName;
        }
        $home_content->save();


        return redirect()->back()->with('success', 'University Section Update Successfully');
    }

    public function setHomeLocationSection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if ($home_content == null) {
            $home_content = new HomeContentSetup;
        }
        $home_content->university_location_title = $request->university_location_title;
        $home_content->save();


        if ($request->type_loction_id) {
            foreach ($request->type_loction_id as $key => $value) {
                $homecontentlocation = new HomeContentLocation;
                $homecontentlocation->type_loction_id = $value;
                $homecontentlocation->location_id = $request->location_id[$key];

                if ($request->location_image) {
                    $image = $request->file('location_image')[$key];

                    if ($image) {
                        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('upload/home_content/university_location'), $filename);

                        $homecontentlocation->photo = $filename;
                    }
                }

                $homecontentlocation->save();
            }
        }

        if (isset($request->old_type_loction_id)) {
            if ($request->old_type_loction_id) {
                foreach ($request->old_type_loction_id as $k => $value) {
                    $homecontentlocation = HomeContentLocation::find($k);
                    $homecontentlocation->type_loction_id = $value;
                    $homecontentlocation->location_id = $request->old_location_id[$k];

                    if ($request->old_location_image) {
                        $image = $request->file('old_location_image')[$k];

                        if ($image) {
                            @unlink(public_path('upload/home_content/university_location/' . $homecontentlocation->photo));

                            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                            $image->move(public_path('upload/home_content/university_location'), $filename);

                            $homecontentlocation->photo = $filename;
                        }
                    }

                    $homecontentlocation->save();
                }
            }
        }

        if ($request->delete_home_content_location) {
            foreach ($request->delete_home_content_location as $value) {
                $homecontentlocation = HomeContentLocation::find($value);
                $homecontentlocation->delete();
            }
        }
        return redirect()->back()->with('success', 'Location Section Update Successfully');
    }


    public function getLocationU($id)
    {
        if ($id == 1) {
            $location = Continent::get();
        } elseif ($id == 2) {
            $location = Country::get();
        } elseif ($id == 3) {
            $location  = State::get();
        } elseif ($id == 4) {
            $location  = City::get();
        }

        return $location;
    }


    public function setCourseSection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if ($home_content == null) {
            $home_content = new HomeContentSetup;
        }
        $home_content->course_title = $request->course_title;
        $home_content->save();
        return redirect()->back()->with('success', 'Course Section Update Successfully');
    }

    public function setPartnerSection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if ($home_content == null) {
            $home_content = new HomeContentSetup;
        }
        $home_content->partner_title = $request->partner_title;
        $home_content->save();
        return redirect()->back()->with('success', 'Partner Section Update Successfully');
    }

    public function setLearnSection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if ($home_content == null) {
            $home_content = new HomeContentSetup;
        }
        $home_content->learn_title = $request->learn_title;
        if ($request->hasFile('learn_image')) {
            @unlink(public_path('upload/home_content/' . $home_content->learn_image));
            $fileName = time() . '_learn_image.' . $request->learn_image->getClientOriginalExtension();
            $request->learn_image->move(public_path('upload/home_content'), $fileName);
            $home_content->learn_image = $fileName;
        }

        if ($request->title_old) {
            foreach ($request->title_old as $key => $value) {
                $learn_text = HomeContentItem::find($key);
                $learn_text->title = $value;
                $learn_text->url = $request->url_old[$key];
                $learn_text->description = $request->description_old[$key];
                $learn_text->type = "homepage";
                $learn_text->save();
            }
        }

        if ($request->old_delete_learn_data) {
            foreach ($request->old_delete_learn_data as $value) {
                $learn_text = HomeContentItem::find($value);
                $learn_text->delete();
            }
        }

        if ($request->title) {
            foreach ($request->title as $key => $value) {
                $learn_text = new HomeContentItem();
                $learn_text->title = $value;
                $learn_text->url = $request->url[$key];
                $learn_text->description = $request->description[$key];
                $learn_text->type = "homepage";
                $learn_text->save();
            }
        }

        $home_content->save();
        return redirect()->back()->with('success', 'Learn Anything Section Update Successfully');
    }

    public function setMediaPartnerSection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if ($home_content == null) {
            $home_content = new HomeContentSetup;
        }
        $home_content->client_title = $request->client_title;
        $home_content->save();
        return redirect()->back()->with('success', 'Media Partner Section Update Successfully');
    }

    public function setCountingSection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if ($home_content == null) {
            $home_content = new HomeContentSetup;
        }
        $home_content->counting_title = $request->counting_title;

        $home_content->count_text_1 = $request->count_text_1;
        $home_content->count_text_2 = $request->count_text_2;
        $home_content->count_text_3 = $request->count_text_3;
        $home_content->count_text_4 = $request->count_text_4;

        $home_content->count_num_1 = $request->count_num_1;
        $home_content->count_num_2 = $request->count_num_2;
        $home_content->count_num_3 = $request->count_num_3;
        $home_content->count_num_4 = $request->count_num_4;
        $home_content->save();
        return redirect()->back()->with('success', 'Counting Section Update Successfully');
    }

    public function setTestimonialsSection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if ($home_content == null) {
            $home_content = new HomeContentSetup;
        }
        $home_content->review_title1 = $request->review_title1;
        $home_content->review_title2 = $request->review_title2;
        $home_content->save();
        return redirect()->back()->with('success', 'Testimonials Section Update Successfully');
    }

    public function setPackageSection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if ($home_content == null) {
            $home_content = new HomeContentSetup;
        }
        $home_content->package_title = $request->package_title;
        $home_content->package_text = $request->package_text;
        $home_content->package_btn = $request->package_btn;
        $home_content->package_btn_url = $request->package_btn_url;
        $home_content->save();
        return redirect()->back()->with('success', 'Package Section Update Successfully');
    }

    public function setQuestionSection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if ($home_content == null) {
            $home_content = new HomeContentSetup;
        }
        $home_content->question_title = $request->question_title;
        $home_content->ques_short_des = $request->ques_short_des;
        $home_content->question_button_text = $request->question_button_text;
        $home_content->question_button_url = $request->question_button_url;
        if ($request->hasFile('question_image')) {
            @unlink(public_path('upload/home_content/' . $home_content->question_image));
            $fileName = time() . '_question_image.' . $request->question_image->getClientOriginalExtension();
            $request->question_image->move(public_path('upload/home_content'), $fileName);
            $home_content->question_image = $fileName;
        }
        $home_content->save();
        return redirect()->back()->with('success', 'Question Section Update Successfully');
    }

    public function setRegisterSection(Request $request)
    {
        $home_content = HomeContentSetup::first();
        if ($home_content == null) {
            $home_content = new HomeContentSetup;
        }
        $home_content->register_title = $request->register_title;
        $home_content->register_des = $request->register_des;
        if ($request->hasFile('register_image')) {
            @unlink(public_path('upload/home_content/' . $home_content->register_image));
            $fileName = time() . '_banner-image.' . $request->register_image->getClientOriginalExtension();
            $request->register_image->move(public_path('upload/home_content'), $fileName);

            $home_content->register_image = $fileName;
        }
        $home_content->save();
        return redirect()->back()->with('success', 'Register Section Update Successfully');
    }

    public function footerActivityGallery(Request $request)
    {
        try {
            // Check if a record exists
            $footerImage = FooterImage::first();

            // If no record exists, create a new one
            if (!$footerImage) {
                $footerImage = new FooterImage();
            }

            // Process uploaded images and encode them to base64
            $images = $request->file('footer_image');
            $base64Images = [];

            // Retrieve old footer images from the request
            $oldFooterImages = [];
            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'old_footer_image_') === 0) {
                    $oldFooterImages[] = $value;
                }
            }
            $base64Images = array_merge($base64Images, $oldFooterImages);

            if ($images) {
                foreach ($images as $image) {
                    if ($image && $image->isValid()) {
                        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('upload/footer_image'), $filename);

                        $base64Images[] = $filename;
                    }
                }
            }

            // Prepare data for the new or existing record
            $data = [
                'footer_image' => json_encode($base64Images)
            ];

            // Update or create the record
            $footerImage->fill($data)->save();

            return redirect()->back()->with('success', 'Activity Image Updated');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }
}
