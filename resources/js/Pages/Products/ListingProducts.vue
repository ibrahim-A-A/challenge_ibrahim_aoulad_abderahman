<template>
   <app-layout>

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>List Products</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   <div class="card-body">   

                 <form :action="route('products.listingProducts')" method="get">
                <!--============== Row =================-->
                 <div class="row" style="margin-top:20px;">
                <!--------- col-sm-4 ----------->
                     <div class="col-sm-3">  

                      <div class="form-group">                  
                    <input name="pricemin" type="text" class="form-control" id="pricemin" placeholder="Min Price">
                      </div>

                     </div>
              <!--------- /col-sm-4 ----------->
              <!--------- col-sm-4 ----------->
                     <div class="col-sm-3">   
                                                             
                         <div class="form-group">
                    <input name="pricemax" type="text" class="form-control" id="pricemax" placeholder="Max Price">
                      </div>

                       </div>                     
              <!--------- /col-sm-4 ----------->
               <!--------- col-sm-4 ----------->
                     <div class="col-sm-3">                                                               
                            <select class="form-control" style="width: 100%;" name="category">  
                                  <option :value="0" selected>--- Choose an category ---</option>  
                                <optgroup v-for="category in this.listCategories" v-bind:key="category.id" :label="category.name_category">
                                <option :value="category.id"> {{  category.name_category}}</option>                                                                                        
                                <option v-for="subCategory in category.subcategories" v-bind:key="subCategory.id" :value="subCategory.id"> {{  subCategory.name_category}}</option>                                                        
                                </optgroup>                                
                            </select>

                       </div>                     
              <!--------- /col-sm-4 ----------->
              <!--------- col-sm-4 ----------->
                    <div class="col-sm-3">                                                               
                        <button  class="btn btn-success" role="button"><i class="fa fa-searsh"></i>Search</button> 
                    </div>                     
              <!--------- /col-sm-4 ----------->
                 </div>
        <!--============== /Row =================-->
 </form>

   </div>
<!------------------------------------------------------------->
   <section class="container">
      <div class="container-fluid">
        <div class="row" style="margin-bottom:60px;margin-left:50px;">
           <div class="col-12">
<!--======================================================-->

    <div class="card cardv" style="display: inline-block;margin-left:15px;" v-for="element in listElments.data" :key="element.id">
      <img  :src="'/images/'+element.image" alt="Denim Jeans" style="width:300px;height:200px;">
      <h5 style="padding:5px;margin-top:20px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{element.name_product}}</h5>
     <p class="price" style="padding:5px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
        {{element.description}} 
      </p>
      <p class="price" style="padding:5px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
        {{element.price}} DH
      </p>
       <p><inertia-link class="mybuttoniner" href="#"> Buy </inertia-link></p>
    </div>

<!--======================================================-->   
          </div> 

       <!----------------->
      <inertia-link :href="link.url" class="pagination" v-for="link in listElments.links" v-bind:key="link.label">
         <span class="page-link"   v-bind:class="{'bg-red-600 font-semibold':link.active}" > {{ link.label }}</span>
      </inertia-link>
      <!------------------>  
  

        </div>
      </div>
   </section>
<!------------------------------------------------------------------->

   </app-layout>
</template>
<script>

  import AppLayout from '@/Layouts/AppLayout'

    export default {

    components: {
                AppLayout

            },  
        props:['elements','categories'],
        data(){
            return {            
             listElments:this.elements,  
             listCategories:this.categories,                   
            }
            }, 
            mounted:function(){
              
            }
    }
    </script>