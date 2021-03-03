<template>
   <app-layout>

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">                  
              <inertia-link :href="'/products/create/'"  class="btn btn-outline-primary"><i class="fas fa-plus"></i>  Add new </inertia-link>                   
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
       
       <!-- <div>
            <div class="alert alert-warning alert-dismissible fade show" role="alert" v-if="$page.flash.success">
            <strong> Dear! </strong>  {{ $page.flash.success }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
        </div>-->

     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">           
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="examplecategory" class="table table-bordered table-striped" style="text-align:center;">

                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name Product</th>
                    <th>Price </th>
                     <th>Action</th>
                  </tr>
                  </thead>

                  <tbody>
        <!------- The Data ------->
             <tr v-for="element in this.listElements" v-bind:key="element.id">                  
                <td> 
                    {{element.id}}
                </td>

                <td> 
                    {{element.name_product}}
                 </td>

                <td> 
                    {{element.price}} MAD
                </td>       
                <td > 
                <inertia-link :href="'/products/edit/'+element.id" :active="$page.currentRouteName == 'products.edit'" class="btn btn-primary" role="button" style="margin-right:5px;"><i class="fas fa-edit"></i></inertia-link>                                  
                <inertia-link :href="'products/'+element.id"  class="btn btn-success" role="button"><i class="fa fa-eye"></i></inertia-link>  
                <button class="btn btn-danger" role="button" @click.prevent="deleteCE(element.id)"  style="margin-left:5px;"><i class="fa fa-trash"></i></button> 
                </td>
            </tr>    
        <!--------- /The Data --------->    
                  </tbody>

                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Name Product</th>
                    <th>Price</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>

                </table>
              </div>
              <!-- /.card-body -->


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

  //======>
    export default { 
    components: {
                AppLayout,
            }, 
            props:['elements'],
            data(){
              return {
            listElements:this.elements,
              }
            },
             mounted:function(){
                   //===> Code jquery
                    $(function () {
                    $("#examplecategory").DataTable({
                    "responsive": true,
                    "autoWidth": false,
                    });
                    $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                    });
                });
            },
            methods :{            
              //====> Delete
          deleteCE(id){                          
                if(confirm("Do you really want to delete?")){
                   this.$inertia.delete('/categories/destroy/'+id).then(()=>{           
                  })
                }
               
              },
              //====> End Delete             
            },       
    }

  
    </script>