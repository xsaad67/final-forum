<template>
	
	<button :class="classes" type="submit" @click="toggle">
		<span class="">❤️</span>
		<span v-text="count"></span>
	</button>

</template>

<script>
	export default{
		props: ['reply'],

		data(){
			return{
				count  : this.reply.favoritesCount,
				active : this.reply.isFavorited,
			}
		},

		computed: {
			classes(){
				return ['btn', this.active ? 'btn-primary' : 'btn-default']; // If favorited by user
			},

			endpoint(){
				return '/replies/' + this.reply.id + '/favorites';
			}
		},

		methods: {
			toggle() {
				this.active ? this.destroy() : this.create();		
			},

			destroy(){
				axios.delete(this.endpoint);
				this.active = false;
				this.count--;
			
			},

			create(){
				axios.post(this.endpoint); 
				this.active = true;
				this.count++;
			}

		}
	};
	
</script>