<option>-- Select Upazila\Thana--</option>
@foreach($get_district_from_div as $all_district_list_all)
<option value="{{$all_district_list_all->Upazila_Thana}}">{{$all_district_list_all->Upazila_Thana}}</option>
@endforeach
</select>
