
<template>
<div>
Login
</div>
</template>

<script>
// @ is an alias to /src
//import HelloWorld from '@/components/HelloWorld.vue'
export default {
    components: {
        //HelloWorld
    },
    name: 'name',
    mounted() {

    },
    data: () => ({
        contador: 1,
        dialog: false,
        drawer: null,
        items: [
              { icon: "mdi-contacts", text: "Contatos" },
              { icon: "mdi-history", text: "Histórico" },
              { icon: "mdi-content-duplicate", text: "Duplicates" },
        ]
    }),
    computed: {

    },
  methods: {
        adicionar() {
              this.contador++
        }
    }
}
</script>

<style lang="scss" scoped>
 #name {

 }
</style>
