@if(!empty($sub_categories))
<ul class="list-unstyled" style="padding-left: 25px">
    @foreach($sub_categories as $category)
       
        dd($category)
       
    @endforeach
</ul>
@endif