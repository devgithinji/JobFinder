<template>
    <div>
        <button v-if="show" @click.prevent="unsave()" class="btn btn-primary" style="width: 100%;">
            UnSave
        </button>
        <button v-else @click.prevent="save()" class="btn btn-dark" style="width: 100%;">
            Save
        </button>
    </div>
</template>

<script>
    export default {
        name: "ApplyComponent",
        props: ['jobid','favourited'],
        data() {
            return {
                'show': true
            }
        },
        mounted(){
          this.show =  this.jobFavourited ? true:false;
        },
        computed:{
            jobFavourited(){
                return this.favourited
            }
        },
        methods: {
            save() {
                axios.post('/save/' + this.jobid)
                    .then((response) => {
                        this.show = true
                    }).catch((error) => {
                    alert('error');
                });
            },
            unsave() {
                axios.post('/unsave/' + this.jobid)
                    .then((response) => {
                        this.show = false
                    }).catch((error) => {
                    alert('error');
                });
            }
        }
    }
</script>

<style scoped>

</style>
