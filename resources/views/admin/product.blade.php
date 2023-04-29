<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')

   <style type="text/css">

      .div_center
      {
        text-align: center;
        padding-top: 40px;

      }  
      .font_size
      {
        font-size: 40px;
        padding-bottom: 40px;
      } 

      .text_color
      {
        color: black;
        padding-bottom: 20px;


      }
      label{

        display: inline-block;
        width: 200px;

      }
      .div_design{
        padding-bottom: 50px;
      }

    </style>
   



  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
       @include('admin.header')
      <div class="main-panel">

          <div class="content-wrapper">

            @if(session()->has('message'))

            <div class="alert alert-success">

              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">#</button>

              {{session()->get('message')}}

             </div>

            @endif
              
            <div class="div_center">


              <h1 class="font_size">Data Entry Form</h1>

              <form action="{{url('/add_product')}}" method="post" enctype="multipart/form-data">
              @csrf

              <div class="div_design">
              <label>Name</label>
              <input class="text_color" type="text" name="title" placeholder="Name of book" required="">
              </div>

             

              <div class="div_design">
              <label>Publisher Name</label>
              <input class="text_color" type="text" name="Description" placeholder="Publisher Name" required="">
              </div>

              <div class="div_design">
              <label>Publisher Age</label>
              <input class="text_color" type="number" name="Price" placeholder="Publisher Age" required="">

              </div>
              <div class="div_design">
              <label>Page Numbers</label>
              <input class="text_color" type="number" name="Discount_Price" placeholder="Page Numbers" required="">

              </div>
              


              <div class="div_design">
              <label>Publish Date</label>
              <input class="text_color" type="date"  name="Quantity" placeholder=" Date" required="">
              </div>
              
              <div class="div_design">
              
               
              
              <!--<div id="checkboxes">
               <label for="one">
                  <input type="checkbox" id="one" />SCI-FI</label>
               <label for="two">
                  <input type="checkbox" id="two" />lITERATURE</label>
                <label for="three">
                 <input type="checkbox" id="three" />ROMANTIC</label>
                </div> -->
                <div class="div_design">
                <label>Type</label>
                <select class="text_color" name="Category" required="">
                <option value="" selected="">Select Type</option>
                @foreach($category as $category)
                <option>{{$category->category_name}}</option>

                @endforeach
              </select>
              </div>

              

              <div class="div_design">
              
              <input type="submit" value="Save"class="btn btn-primary">
              </div>

              </form>

              

            </div>

          </div>
        </div>
        
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>