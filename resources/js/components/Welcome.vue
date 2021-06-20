<template>
   <div class="container custom-padding">
       <div class="myForm">
           <div class="card">
               <div class="card-header alert-dark">
                   Get your result now
               </div>
               <div class="card-body">
                   <form class="">
                       <div class="form-group">
                           <label for="exam_type">Select Level:</label>
                           <select name="" id="exam_type" class="form-control">
                               <option value="exam_type">SSC</option>
                               <option value="">SSC</option>
                           </select>
                       </div>
                       <div class="form-group">
                           <label for="registration_number">Registration Number:</label>
                           <input type="text" id="registration_number" class="form-control" placeholder="Registration Number">
                       </div>
                       <div class="form-group">
                           <label for="pin_number">PIN Number:</label>
                           <input type="text" id="pin_number" class="form-control" placeholder="PIN Number">
                       </div>

                       <div class="form-group text-right">

                           <input type="submit" value="Submit" class="btn btn-primary">
                       </div>

                   </form>
               </div>
           </div>
       </div>
   </div>
</template>

<script>
export default {
    name: "Welcome"
}
</script>

<style scoped>
.custom-padding{
    margin-top: 35%;
}

.myForm {
    min-width: 500px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #fafafa;

}
.card{
    background-color: #2c3e50 !important;
}


@media (max-width: 500px) {
    .myForm {
        min-width: 90%;
    }
}
</style>
