<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
     crossorigin="anonymous">

</head>
<body>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">img</th>
            <th scope="col">name</th>
            <th scope="col">action</th>
          </tr>
        </thead>
            <tbody>
                @foreach ($users as $user)
                
                        <tr scope="row">
                            <td>{{ $user->id }}</td>
                            <td><img src="{{ asset('./storage/imgs/'.$user->img) }}" width="70px"></td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                                    <a class="btn btn-primary"
                                    href="{{ route('user.edit',$user->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                              {{-- 
                              daba hna f Edit kan3tiwhom f href="{{route('user.edit')}}" 
                              kay3ni anaho ghaymchi l web.php(routage)
                              kaychof ach man functionality lighaydir lkadih lcontroller
                              naf lhaja f Delete ghir howa kandiroh f method
                              --}}
                        </tr>
                    
                
                @endforeach
            </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
     integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>
</html>