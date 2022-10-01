
                                    @foreach($danhSachHoaChat as $danhSach)
                                    <tr>
                                        <td>
                                            {{ $danhSach['stt'] }}
                                        </td>
                                        <td>
                                        {{ $danhSach['hoaChat']->ma_danh_muc_hoa_chat }}
                                        </td>
                                        <td>
                                        {{ $danhSach['hoaChat']->ten_hoa_chat }}
                                        </td>
                                        <td>
                                        {{ $danhSach['stt'] }}
                                        </td>
                                        <td>
                                        {{ $danhSach['stt'] }}
                                        </td>
                                        <td>
                                        {{ $danhSach['stt'] }}
                                        </td>
                                        <td>
                                        {{ $danhSach['stt'] }}
                                        </td>
                                        <td>
                                        {{ $danhSach['stt'] }}
                                        </td>
                                        <td>
                                        {{ $danhSach['stt'] }}
                                        </td>
                                        <td>
                                        {{ $danhSach['stt'] }}
                                        </td>
                                        <td>
                                            <P class="money">{{ $danhSach['stt'] }}</P>
                                        </td>
                                        <td>
                                            <P class="money">{{ $danhSach['stt'] }}</P>
                                        </td>
                                        <td>
                                            <P class="money">{{ $danhSach['stt'] }}</P>
                                        </td>
                                    </tr>
                                    @endforeach
       

