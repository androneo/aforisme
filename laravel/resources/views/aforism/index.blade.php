@extends('layouts.master')

@section('sidebar')
<!-- Sidebar -->
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="#">
                Etichete
            </a>
        </li>
        @foreach ($headTags as $headTag)
        <li>
            <a href="{{url('/etichete', [$headTag->slug])}}"> {{$headTag->name}} <span class="badge">{{ $headTag->count }}</span></a>
        </li>
        @endforeach
    </ul>
</div>
<!-- /#sidebar-wrapper -->
@endsection

@section('content')

@endsection

@section('scripts')
<script type="text/javascript">
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    $(function() {
        $('.ajax-like').click(function(e) {
            e.preventDefault();
            var id = $(this).attr("id");

            if($(this).hasClass("favorited")){
                $.ajax({
                    url: '{{ url('favorites') }}'+'/'+id,
                    type: "post",
                    data: {'id': id},
                    success: function(response){
                        $("#"+id).removeClass("favorited");
                        $("#"+id).addClass("not-favorited");
                        if(response.count == 0){
                            $( "#badge-"+id ).remove();
                        }else{
                            $("#badge-"+id).html(response.count);
                        }
                    }
                });
            } else if($(this).hasClass("not-favorited")) {
                $.ajax({
                    url: '{{ url('favorites/store') }}',
                    type: "post",
                    data: {'id': id},
                    success: function(data){
                        $("#"+id).removeClass("not-favorited");
                        $("#"+id).addClass("favorited");
                        if ($("#badge-"+id).length){
                            $("#badge-"+id).html(data.count);
                        } else {
                            $( "<div class='badge' id='badge-"+id+"'>"+data.count+"</div>" ).insertBefore( "#"+id );
                        }
                    }
                });
            }
        });
    });
</script>

@endsection