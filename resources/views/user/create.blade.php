<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="./ratify-upload.css">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <title>create
    </title>
    <style>
        body { background: #fafafa; }
    </style>
</head>

<body>
    <div class="container">
            <form method ="POST" 
            action="{{route('user.store') }}"
            enctype="multipart/form-data">
            
            @csrf
            <div class="row justify-content-center" style="padding-top: 35px;">
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name"
                                         class="form-control" 
                                         placeholder="Name"
                                        @if (isset($user)) 
                                        value="{{ $user->name }}"
                                        @endif
                                        >
                                        @error('name')
                                            <p>name</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">File</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="fileDemo"
                                        
                                        name="img">
                                        @error('img')
                                            <p>img</p>
                                        @enderror
                                        @if (isset($user)) 
                                        {{ $user->img }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>
</html>
