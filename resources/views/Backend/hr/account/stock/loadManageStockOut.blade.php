
                    @php
                        $totalDownPay = '0';
                        $totalPrice = '0';
                      @endphp
                      
                        @foreach ($cart as $i=>$ct)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>
                                    @foreach ($user as $usr)
                                        @if ($usr->id == $ct->user_id)
                                            {{ $usr->name }}
                                        @endif
                                    @endforeach
                                </td>

                                <td>
                                    @foreach ($pkg as $pk)
                                        @if ($pk->id == $ct->package_id)
                                            {{ $pk->package_title }}
                                        @endif
                                    @endforeach
                                </td>

                                <td>
                                    {{ $ct->down_payemnt }}
                                    @php
                                        $totalDownPay = $totalDownPay+$ct->down_payemnt;
                                    @endphp
                                </td>

                                <td>
                                    {{ $ct->price }}
                                    @php
                                        $totalPrice = $totalPrice+$ct->price;
                                    @endphp
                                </td>

                                <td>
                                    {{ $ct->deal_date }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td><b>Total</b></td>
                            <td>{{ $totalDownPay }}</td>
                            <td>{{ $totalPrice }}</td>
                            <td></td>
                        </tr>