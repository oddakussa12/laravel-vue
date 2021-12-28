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
                    <td>
                        <div class="btn-group" role="group">
                            <router-link :to="{name: 'edit', params: { id: contact.id }}" class="btn btn-success btn-sm">Edit</router-link>
                            <button class="btn btn-danger btn-sm" @click="deleteContact(contact.id)">Delete</button>
                        </div>
                    </td>
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
    methods:{
        loadData(){
            let url = this.url + '/api/getContacts';
            this.axios.get(url).then(response=> {
                this.contacts = response.data
            });
        },
        deleteContact(id){
            this.axios
                    .delete(`http://localhost:8000/api/deleteContact/${id}`)
                    .then(response => {
                        let i = this.contacts.map(data => data.id).indexOf(id);
                        this.contacts.splice(i, 1)
                    });
        }
    }
}
</script>
