<template>
    <div class="container" style="margin-top:100px;">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact no</th>
                <th scope="col">Designation</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody :key="contact.id" v-for="contact in contacts">
                <tr>
                    <td>{{contact.id}}</td>
                    <td>{{contact.name}}</td>
                    <td>{{contact.email}}</td>
                    <td>{{contact.contact_no}}</td>
                    <td>{{contact.designation}}</td>
                    <td><button class="btn btn-danger btn-sm">Delete</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name:'Contactlist',
    data() {
        return {
            url:document.head.querySelector('meta[name="url"]').content,
            contacts:[],
        }
    },
    created(){
        this.loadData();
    },
    mounted(){
        
    },
    methods:{
        loadData(){
            let url = this.url + '/api/getContacts';
            // console.log(url);
            this.axios.get(url).then(response=> {
                this.contacts = response.data
                console.log(this.contacts)
            });
        },
    }
}
</script>
