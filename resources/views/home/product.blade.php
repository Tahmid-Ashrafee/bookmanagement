<section class="product_section layout_padding">

         
         <div class="container">
            <div class="heading_container heading_center">
               
               
            </div>

            @if(session()->has('message'))

            <div class="alert alert-success">

              <button type="button" class<h2>
                  <span>Search Reesult</span>
               </h2>

               <br><br>

               <div>
                  
                  <form action="{{url('product_search')}}" method="GET">
                     <input style="width: 300px;" type="text" name="search" placeholder="Search for products">

                     <input type="submit" value="search" >
                     

                  </form>



               </div>


ss="close" data-dismiss="alert" aria-hidden="true">x</button>

              {{session()->get('message')}}

             </div>

            @endif

            
               
           

               
              
         </div>
      </section>