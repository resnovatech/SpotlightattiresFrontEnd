<option>-- Select District --</option>
@foreach($get_district_from_div as $all_district_list_all)
<option value="{{$all_district_list_all->District}}">{{$all_district_list_all->District}}</option>
@endforeach
</select>
