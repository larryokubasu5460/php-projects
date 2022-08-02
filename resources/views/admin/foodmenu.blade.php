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
    <!-- container-scroller -->


    <div style="position:relative; top:30px; right:-150px;">
        <form action="{{url('/uploadFood')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div style="padding:10px;">
                <label for="title">Title</label>
                <input type="text" placeholder="Title" style="color:black;" name="title" required />
            </div>
            <div style="padding:10px;">
                <label for="price">Price</label>
                <input type="num" placeholder="Price" style="color:black;" name="price" required />
            </div>
            <div style="padding:10px;">
                <label for="image">Image</label>
                <input type="file" name="image" required />
            </div>
            <div style="padding:10px;">
                <label for="description">Description</label>
                <input type="text" name="description" style="color:black;" placeholder="Description" required />
            </div>
            <div style="padding:10px;">
                <button type="submit" style="background:gray;padding:10px;" value="submit">Submit</button>
            </div>
        </form>
        <div style="padding-top:5px;">
    
    <table bgcolor="black">

    <tr>
        <th style="padding:25px;">Title</th>
        <th style="padding:25px;">Price</th>
        <th style="padding:25px;">Description</th>
        <th style="padding:25px;">Image</th>
        <th style="padding:25px;">Action</th>
    </tr>
    @foreach($data as $data)
    <tr align="center">
        <td>{{$data->title}}</td>
        <td>{{$data->price}}</td>
        <td>{{$data->description}}</td>
        <td><img height=100 width=100 src="/foodimage/{{$data->image}}"></td>
        <td><a href="{{url('/deletefood', $data->id)}}">Delete</a></td>
    </tr>
    @endforeach
    </table>

    </div>
    </div>

  
    <!-- page-body-wrapper ends -->

   
</div>
@include("admin.adminscript")
   
  </body>
</html>