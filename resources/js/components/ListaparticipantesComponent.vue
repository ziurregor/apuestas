<template>
    <div>
        

        <hr class="mt-3">
        <h3>Lista de Participantes</h3>
        <ul class="list-group my-2">
        <table  class="table">
            
        <!-- <li class="list-group-item"  v-for="(item, index) in user" :key="index">  -->
            <span class="badge badge-primary float-right">
                <!-- {{ item.updated_at }} -->
            </span>
            <tr v-for="(item, index) in user" :key="index">
                <td>
                    <p>
               {{ item.id }}
                    </p>  
                </td>
                <td>
                    <p>
               {{ item.name }}
                    </p>  
                </td>
                <td>
                    <p>
               {{ item.email }}
                    </p>  
                </td>
            </tr>
        <!-- </li> -->
        </table>
        </ul>
    </div>
</template>

<script>
    export default {
        data () {
            return{
            user : [],
            equipo : { id: ''},
            editarActivo: false,
            }
        },
        created(){
            axios.get('/participantes')
            .then(res => {
                this.user = res.data;
            })
        }
        ,
        // methods:{
        //         editarFormulario(item){
        //             this.editarActivo = !this.editarActivo;
        //             this.equipo.pais = item.pais;
        //             this.equipo.id = item.id;
        //         }
        //         ,
        //         editarequipo(item){
        //             // this.editarActivo = !this.editarActivo;
        //             // this.equipo.pais = item.pais;
        //             // this.equipo.id = item.id;
        //             const params = {pais : item.pais};
        //             axios.put(`/equipos/${item.id}`,params)
        //             .then(res => {
        //                 const index = this.equipos.findIndex(
        //                     equipoBuscar => equipoBuscar.id === res.data.id
        //                 )
        //                 // this.equipos[index]=res.data;
        //                 this.equipos[index].pais=res.data.pais

        //                 this.equipo.pais='';
        //                 // this.equipos[index].descripcion=res.data.descripcion
        //             })
        //         }
        //         ,
        //         agregar() {
        //             // console.log(this.equipo.pais); 
        //             const params = { pais: this.equipo.pais}

        //             //const nuevoequipo = this.equipo ;
        //             this.equipo.pais = '';
        //             console.log(params); 
        //             // alert('se insertara = ' + params);
        //             axios.post('/equipos',params)
        //                 .then(res => {
        //                     this.equipos.push(res.data)
        //                 })
                        
        //         },
        //         eliminarequipo(item,index){
        //             axios.delete(`/equipos/${item.id}`)
        //                 .then(()=>{
        //                    this.equipos.splice(index,1); 
        //                 })
        //         }
        // }
        // ,
        // mounted() {
        //     console.log('Component mounted.')
        // }
    }
</script>
