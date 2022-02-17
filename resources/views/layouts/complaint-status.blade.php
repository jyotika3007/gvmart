@if(isset($status))
    @if($status == 1)
        <span style="display: none; visibility: hidden">1</span>
        <button type="button" class="btn btn-success btn-sm">Open</button>
        @else
        <span style="display: none; visibility: hidden">0</span>
        <button type="button" class="btn btn-danger btn-sm">Close</button>
    @endif
@endif