<template>
   <app-layout>
     <form  @submit.prevent="submit" method="POST" enctype="multipart/form-data">     
<!--------------------------------------------------------->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Product</h1>
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
                <h3 class="card-title">Update Product</h3>
              </div>
<!-----------  Card ------------->
            <div class="card-body">   

                <!--============== Row =================-->
                 <div class="row" style="margin-top:20px;">
                <!--------- col-sm-6 ----------->
                     <div class="col-sm-6">  

                      <div class="form-group">
                    <label  for="name_product">Name Product :</label>
                    <input v-model="form.name_product"  type="text" class="form-control" id="name_product" placeholder="Name Product" required pattern=".{1,100}" title="You must enter between 1 and 100 letters">
                      </div>

                     </div>
              <!--------- /col-sm-6 ----------->

              <!--------- col-sm-6 ----------->
                     <div class="col-sm-6">   
                                                             
                         <div class="form-group">
                    <label for="price">Price :</label>
                    <input v-model="form.price"  type="text" class="form-control" id="price" placeholder="0.00">
                      </div>

                       </div>                     
              <!--------- /col-sm-6 ----------->
                 </div>
        <!--============== /Row =================-->
          <!--============== Row =================-->
                 <div class="row" style="margin-top:20px;">
                <!--------- col-sm-12 ----------->
                     <div class="col-sm-12">  

                      <div class="form-group">
                    <label  for="description">Description :</label>
                    <input v-model="form.description"  type="text" class="form-control" id="description" placeholder="Descrption" required pattern=".{1,100}" title="You must enter between 1 and 250 letters">
                      </div>

                     </div>
              <!--------- /col-sm-12 ----------->
                 </div>
        <!--============== /Row =================-->
         <!--============== Row =================-->
                 <div class="row" style="margin-top:20px;">
                <!--------- col-sm-6 ----------->
                     <div class="col-sm-6">  

                      <div class="form-group">
                       <label>Choose an image :</label>   
                  <input name="image" ref="image"  @change="imageSelected" id="image" type="file" class="form-control" pattern="([^\s]+(\.(?i)(jpg|png))$)">                                                                                      
                       </div>

                     </div>
              <!--------- /col-sm-6 ----------->

              <!--------- col-sm-6 ----------->
                     <div class="col-sm-6">   
                                                               
                           <label>Categories :</label>
                            <select class="form-control" style="width: 100%;" v-model="form.category_id"> 
                                <option :value="0">--- Choose an category ---</option>  
                                <optgroup v-for="category in this.listCategories" v-bind:key="category.id" :label="category.name_category">
                                <option :value="category.id"> {{  category.name_category}}</option>                                                                                        
                                <option v-for="subCategory in category.subcategories" v-bind:key="subCategory.id" :value="subCategory.id"> {{  subCategory.name_category}}</option>                                                        
                                </optgroup>                                
                            </select>

                       </div>                     
              <!--------- /col-sm-6 ----------->
                 </div>
        <!--============== /Row =================-->

        
                    <div class=" d-flex justify-content-end align-items-center">
                      <inertia-link type="button" :href="'/products'" class="btn btn-info">Annuler <i style="margin-left:5px;" class="fas fa-times-circle"></i></inertia-link>
                      <button style="margin-left:5px;" type="submit" class="btn btn-success">Update <i style="margin-left:5px;" class="fas fa-paper-plane"></i></button>
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
            props:['element','categories'],
//====================================================           
            data(){
              return {
               listCategories:this.categories,                                                      
               form:{
                   id:this.element.id,
                   name_product:this.element.name_product,
                   description:this.element.description,
                   price:this.element.price,
                   category_id:this.element.category_id,
                   image:null,
               }
              }
            },
//====================================================   
            computed:{
              
                 },
//====================================================   
            mounted:function(){             
           },
//====================================================               
            methods :{
                imageSelected(e){
               let  selectedFile=e.target.files[0];                 
                    this.form.image=selectedFile;      
                                },
              submit()
                     {   
                         let data = new FormData;    
                  data.append('id',this.form.id)        
                  data.append('name_product',this.form.name_product);
                  data.append('description',this.form.description);
                  data.append('price',this.form.price);
                  data.append('category_id',this.form.category_id);
                  data.append('image',this.form.image);
                             try{                               
                 this.$inertia.post('/products/update/',data);

                 }catch(error){
                              } 

                    },
            },
//====================================================                     
    }
  
    </script>