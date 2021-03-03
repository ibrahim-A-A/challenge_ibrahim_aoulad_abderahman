<template>
   <app-layout>
     <form  @submit.prevent="submit" method="POST" enctype="multipart/form-data">     
<!--------------------------------------------------------->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Category</h1>
          </div>
          <div class="col-sm-6">         
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


 <div class="col-md-12" style="margin-bottom:100px;">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">New Category</h3>
              </div>
<!-----------  Card ------------->
            <div class="card-body">   

<!--============== Row =================-->
                 <div class="row" style="margin-top:20px;">
                <!--------- col-sm-6 ----------->
                     <div class="col-sm-6">  

                      <div class="form-group">
                    <label  for="name_category">Name Category :</label>
                    <input v-model="form.name_category"  type="text" class="form-control" id="name_category" placeholder="Name category" required  pattern=".{1,100}" title="You must enter between 1 and 100 letters">
                      </div>

                     </div>
              <!--------- /col-sm-6 ----------->

              <!--------- col-sm-6 ----------->                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
                     <div class="col-sm-6">   
                                                             
                        <label>Parent Categories :</label>
                          <select class="form-control" style="width: 100%;" v-model="form.parent_id"> 
                              <option :value="0">--- Choose an category ---</option>                          
                              <option v-for="category in this.listCategories" v-bind:key="category.id" :value="category.id"> {{ category.name_category }}</option>                             
                          </select>

                       </div>                     
              <!--------- /col-sm-6 ----------->
                 </div>
        <!--============== /Row =================-->

        
                    <div class=" d-flex justify-content-end align-items-center">
                      <inertia-link type="button" :href="'/categories'" class="btn btn-info">Annuler <i style="margin-left:5px;" class="fas fa-times-circle"></i></inertia-link>
                      <button style="margin-left:5px;" type="submit" class="btn btn-success">Ajouter <i style="margin-left:5px;" class="fas fa-paper-plane"></i></button>
                    </div>
            </div>   
<!-----------  /Card ------------->

            </div>
          </div>
 
<!--------------------------------------------------------->
     
     </form>
   </app-layout>
</template>

<script>

   //===> Imports
  import AppLayout from '@/Layouts/AppLayout'

  //========> 
    export default { 
    components: {
                AppLayout,
            }, 
            props:['categories'],
//====================================================           
            data(){
              return {   
                listCategories:this.categories,                                                      
               form:{
                   name_category:null,
                   parent_id:null
               }
              }
            },
//====================================================   
            computed:{
              
                 },
//====================================================   
            mounted:function(){  
              this.form.parent_id=0;           
           },
//====================================================               
            methods :{
              submit()
                     {   
                             try{                               
                 this.$inertia.post('/categories/',this.form);
                 }catch(error){
                              } 

                    },
            },
//====================================================                     
    }
  
    </script>