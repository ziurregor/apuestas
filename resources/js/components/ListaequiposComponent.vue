<template>
    <div>
        
        <form v-on:submit.prevent="editarequipo(equipo)" v-if="editarActivo">
            <h3>Equipos Edicion</h3>
        <!-- <form @submit.prevent="agregar"> -->
            <input type="text" placeholder="Coloque el pais" class="form-control mb-2"
            v-model="equipo.pais">
            <button class="btn btn-success" type="submit">Guardar Pais</button>
            <button class="btn btn-danger btn-sm"
            v-on:click="editarequipo(item)">Cancelar Edicion</button>
            
        </form>

        <form v-on:submit.prevent="agregar" v-else>
            <h3>Equipos Adicion</h3>
        <!-- <form @submit.prevent="agregar"> -->
            <input type="text" placeholder="Coloque el pais" class="form-control mb-2"
            v-model="equipo.pais">
            <button class="btn btn-primary" type="submit">Adicionar Pais</button>
        </form>
        <hr class="mt-3">
        <h3>Lista de equipos</h3>
        <ul class="list-group my-2">

            <li class="list-group-item"
            v-for="(item, index) in equipos" :key="index"> 
            <span class="badge badge-primary float-right">
                {{ item.updated_at }}
                
            </span>
            <p>{{ item.id }}</p>
            <p>{{ item.pais }}</p>
            <button class="btn btn-danger btn-sm"
            v-on:click="eliminarequipo(item,index)">Eliminar</button>
            <!-- <button class="btn btn-danger btn-sm"
            @click="eliminarequipo(item,index)">Eliminar</button> -->
            <button class="btn btn-warning btn-sm"
            v-on:click="editarFormulario(item)">Modificar</button>
            </li>
        </ul>
    </div>

    <!-- <table border="1"> 
        <tr>
            <th>Nº</th><th>Nombre</th><th>Estado</th>
        </tr>
        <tr>
            <td>Nº</td><td>Nombre</td><td>Estado</td>
        </tr>
    </table> -->

</template>

<script>
    export default {
        data () {
            return{
            equipos : [],
            equipo : { pais: ''},
            editarActivo: false,
            }
        },
        created(){
            axios.get('/equipos')
            .then(res => {
                this.equipos = res.data;
            })
        }
        ,
        methods:{
                editarFormulario(item){
                    this.editarActivo = !this.editarActivo;
                    this.equipo.pais = item.pais;
                    this.equipo.id = item.id;
                }
                ,
                editarequipo(item){
                    // this.editarActivo = !this.editarActivo;
                    // this.equipo.pais = item.pais;
                    // this.equipo.id = item.id;
                    const params = {pais : item.pais};
                    axios.put(`/equipos/${item.id}`,params)
                    .then(res => {
                        const index = this.equipos.findIndex(
                            equipoBuscar => equipoBuscar.id === res.data.id
                        )
                        // this.equipos[index]=res.data;
                        this.equipos[index].pais=res.data.pais

                        this.equipo.pais='';
                        // this.equipos[index].descripcion=res.data.descripcion
                    })
                }
                ,
                agregar() {
                    // console.log(this.equipo.pais); 
                    const params = { pais: this.equipo.pais}

                    //const nuevoequipo = this.equipo ;
                    this.equipo.pais = '';
                    console.log(params); 
                    // alert('se insertara = ' + params);
                    axios.post('/equipos',params)
                        .then(res => {
                            this.equipos.push(res.data)
                        })
                        
                },
                eliminarequipo(item,index){
                    axios.delete(`/equipos/${item.id}`)
                        .then(()=>{
                           this.equipos.splice(index,1); 
                        })
                }
        }
        // ,
        // mounted() {
        //     console.log('Component mounted.')
        // }
    }
</script>
