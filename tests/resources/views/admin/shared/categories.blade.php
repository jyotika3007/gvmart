

<ul class="list-unstyled">
    @foreach($categories as $cate)
    @php $category = $cate['main'] @endphp
        <li>
            <div class="checkbox">
                <label>
                    <input
                            type="checkbox"
                            @if(isset($selectedIds) && in_array($category->id, $selectedIds))checked="checked" @endif
                            name="categories[]"
                            value="{{ $category->id }}">
                    {{ $category->name }}
                </label>
            </div>
        </li>
        @if(!empty(count($cate['main']['main'])) && count($cate['main']['main']) >= 1)
            @include('admin.shared.category-children', ['categories' => $category['main'], 'selectedIds' => $selectedIds])
        @endif
    @endforeach
</ul>