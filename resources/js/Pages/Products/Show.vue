<template>
   <app-layout>

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">                  
              <inertia-link :href="'/products'"  class="btn btn-outline-info"><i class="fas fa-arrow-left"></i> Back </inertia-link>                   
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
       
     

     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">           
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
               
              </div>
              <!-- /.card-body -->

            <!--============== Row =================-->
                 <div class="row" style="margin-top:20px;">
                     <div class="col-sm-4">                      
                     </div>
                     <div class="col-sm-4"> 

                    <img :src="'/images/'+detailsElement.image" style="width:200px;height:200px;">

                       </div>                     
                     <div class="col-sm-4">                                                                                          
                       </div>                     
                 </div>
        <!--============== /Row =================-->
         <!--============== Row =================-->
                 <div class="row" style="margin-top:20px;">
                     <div class="col-sm-4">                      
                     </div>
                     <div class="col-sm-4"> 

                    <label>Name product : </label> <span> {{detailsElement.name_product }}</span><br>
                    <label>Descreption : </label> <span> {{detailsElement.description }}</span><br>
                    <label>Price : </label> <span> {{detailsElement.price }} <label>DH</label></span><br>
                    
                       </div>                     
                     <div class="col-sm-4">                                                                                          
                       </div>                     
                 </div>
        <!--============== /Row =================-->

            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    

   </app-layout>
</template>

<script>

   //===> Imports
  import AppLayout from '@/Layouts/AppLayout'
import Label from '../../Jetstream/Label.vue'

  //======>
    export default { 
    components: {
                AppLayout,
      
        Label      }, 
            props:['element'],
            data(){
              return {
            detailsElement:this.element,
              }
            },
             mounted:function(){
                  
            },
            methods :{                                 
            },       
    }
    </script>