<template id="post-list">
	<div class="row">
		<div class="pull-right">
			<router-link class="btn btn-primary" v-bind:to="{path:'/add-post'}">
				<span class="glyphicon glyphicon-plus"></span>
				Add New Employee
			</router-link>
			<br><br>
		</div>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th class="text-center">Nama</th>
					<th class="text-center">Jabatan</th>
					<th class="text-center">Jenis Kelamin</th>
					<th class="text-center">Tanggal Input</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(post,index) in filteredPost">
					<td class="text-center">{{ index + 1 }}</td>
					<td class="text-center">{{ post.name }}</td>
					<td class="text-center">{{ post.jabatan }}</td>
					<td class="text-center">{{ post.jenis_kelamin }}</td>
					<td class="text-center">{{ post.created_at }}</td>
					<td>
						<div class="btn-group" style="margin-left:20%">
						<router-link class="btn btn-primary" v-bind:to="{name:'Viewpost',params:{id: post.id}}">Show</router-link>
						<router-link class="btn btn-success" v-bind:to="{name:'Editpost',params:{id: post.id}}">Edit</router-link>
						<router-link class="btn btn-danger" v-bind:to="{name:'Deletepost',params:{id: post.id}}">Delete</router-link>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>
<script>
	export default{
		data:function(){
			return { post:'' };
		},
		created: function(){
			let uri = 'http://localhost:8000/karyawans/';
			Axios.get(uri).then((response) =>{
				this.post = response.data;
			});
		},
		Deletepost: function(){
				let uri = 'http://localhost:8000/karyawans/'+this.$route.params.id;
				Axios.delete(uri,this.post).then((response)=>{
					this.$router.push({name:'Listpost'});
				});
		},
		computed: {
			filteredPost: function(){
				if(this.post.length){
					return this.post;
				}
			}
		}
	}
</script>