<x-app-layout>
   
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include("admin.admincss")
  </head>
  <body>

  <div class="container-scroller">
  @include("admin.navbar")
    <div style="position:relative; top:60px; right:-150px;">
        <table style="background-color:grey;border:3px;">
            <tr>
                <th style="padding:30px;">Name</th>
                <th style="padding:30px;">Email</th>
                <th style="padding:30px;">Action</th>
            </tr>
            @foreach($data as $dat )
            <tr align="center">
                <td>{{$dat->name}}</td>
                <td>{{$dat->email}}</td>

                @if($dat->usertype=="0")
                <td><a href="{{url('/deleteuser', $dat->id)}}">Delete</a></td>
                @else
                <td>Not Allowed</td>
                @endif
            </tr>
            @endforeach
        </table>
    </div>
    </div>
@include("admin.adminscript")
   
  </body>
</html>