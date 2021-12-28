<template>
  <div class="container" style="margin-top:80px;">
      <div class="alert alert-danger" v-if="errors.length">
          <ul>
              <li v-for="(error, index) in errors" :key="index">
                  {{error}}
              </li>
          </ul>
      </div>
      <form @submit.prevent="saveContact">
            <div class="form-group">
                <label for="name">Full name</label>
                <input v-model="contact.name" type="text" class="form-control" placeholder="Full name">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input v-model="contact.email" type="email" class="form-control" placeholder="Email address">
            </div>
             <div class="form-group">
                <label for="contact_no">Contact no</label>
                <input v-model="contact.contact_no" type="number" class="form-control" placeholder="Contact No">
            </div>
            <div class="form-group">
                <label for="designation">Designation</label>
                <input v-model="contact.designation" type="text" class="form-control" placeholder="Designation">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
  </div>
</template>

<script>
export default {
    name:'AddContact',
    data(){
        return{
            url:document.head.querySelector('meta[name="url"]').content,
            contact:{},
            errors:[],
        }
    },
    methods:{
        saveContact(){
            this.errors = [];
            if(!this.contact.name){
                this.errors.push('name is required')
            }if(!this.contact.email){
                this.errors.push('email is required')
            }if(!this.contact.contact_no){
                this.errors.push('contact_no is required')
            }if(!this.contact.designation){
                this.errors.push('designation is required')
            }
            if(!this.errors.length){
                let url = this.url + '/api/saveContacts'
                this.axios
                .post(url, this.contact)
                .then(response => (
                    this.$router.push({ name: 'contacts' })
                ))
                .catch(err => console.log(err))
                // .finally(() => this.loading = false)
            }
        },
    },
}
</script>

<style scoped>
    form{
        max-width:600px;
        margin-top: 80px;
    }
</style>