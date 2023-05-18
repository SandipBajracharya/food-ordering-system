<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">{{array_key_last($breadcrumb)}}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                @foreach ($breadcrumb as $key => $value)
                    <li class="breadcrumb-item">
                        <a href="{{$value}}">{{$key}}</a>
                    </li>
                @endforeach
            </ol>
        </div>
        </div>
    </div>
</div>

