<style>
    #cat-arrow{
        position: absolute;
        right: 30%;
    }
</style>

<ul class="list-unstyled parent-cat" >
    @foreach($categories as $cate)
    @php $category = $cate['main'] @endphp
        <li style="margin-bottom: 20px;">
            <div class="checkbox">
                <label>
                    <input
                            type="checkbox"
                            @if(isset($selectedIds) && in_array($category->id, $selectedIds))checked="checked" @endif
                            name="categories[]"
                            value="{{ $category->id  ?? ''}}" onclick="getCateName('{{ $category->name ?? '' }}')">
                    {{ $category->name ?? '' }} 
                </label>
                <i class="fa fa-angle-down" id="cat-arrow" onclick="getChildCategories({{ $category->id }})"></i>
            </div>
        </li>
        
        
        <?php
        
            $sub_categories  = DB::table('categories')->where('parent_id',$category->id)->where('status',1)->get();
        
        ?>
        @if($sub_categories)
        
            
            
            <ul class="list-unstyled child-cat" id="child-cat{{ $category->id }}" style="margin-left: 25px; display: none;">
    @foreach($sub_categories as $sub_cat)
        <li>
            <div class="checkbox">
                <label>
                    <input
                            type="checkbox"
                            @if(isset($selectedIds) && in_array($sub_cat->id, $selectedIds))checked="checked" @endif
                            name="categories[]"
                            value="{{ $sub_cat->id ?? ''}}" onclick="getCateName('{{ $category->name ?? '' }}')">
                    {{ $sub_cat->name ?? '' }}
                </label>
            </div>
        </li>
        
        <?php
        
            $sub2_categories  = DB::table('categories')->where('parent_id',$sub_cat->id)->where('status',1)->get();
        
        ?>
        @if($sub2_categories)
        
           <ul class="list-unstyled sub-child-cat" style="padding-left: 25px">
    @foreach($sub2_categories as $sub2_cat)
        
        <li>
            <div class="checkbox">
                <label>
                    <input
                            type="checkbox"
                            @if(isset($selectedIds) && in_array($sub2_cat->id, $selectedIds))checked="checked" @endif
                            name="categories[]"
                            value="{{ $sub2_cat->id }}" onclick="getCateName('{{ $category->name ?? '' }}')">
                            {{ $sub2_cat->name }}
                </label>
            </div>
        </li>
        
    @endforeach
</ul>

        @endif
    @endforeach
            <br>
</ul>
            
            
            
           
        @endif
    @endforeach
</ul>



<script>

    
    function getChildCategories(id){
        $('.child-cat').hide();
        $('#child-cat'+id).toggle();
        
    }
    
    function getCateName(name){
        // alert(name);
      var id =  $("input:checkbox:checked").val();
    //   alert(id)
      
      if(id != 'on'){
      
    jQuery.ajax({
     url: '/admin/getSkuCode',
     type: 'GET',
     data: { cat_id: id },
     success: function (data) {
       $('.product_slug_insert').val(data);
     
    },
    failure: function (data) {
     Swal('Something Went Wrong');
   }
       
   
 });
      }
      else{
          $('.product_slug_insert').val('');
      }
        
    }
</script>