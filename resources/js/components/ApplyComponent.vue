<template>
    <div>
        <form @submit="formSubmit" action="">
            <button  v-if="show" type="submit" class="btn btn-success" style="width: 100%;">
                Apply
            </button>
            <div v-else class="alert alert-success">
                Application sent successfully
            </div>
        </form>

    </div>
</template>

<script>
    export default {
        name: "ApplyComponent",
        props:["jobid"],
        data(){
            return{
                'show' : true
            }
        },
        methods:{
            formSubmit(e){
                e.preventDefault();
                axios.post('/applications/'+this.jobid)
                    .then((response)=>{
                        this.show =false
                    }).catch((err)=>{
                        alert('error');
                });
            }
        }
    }
</script>

<style scoped>

</style>
