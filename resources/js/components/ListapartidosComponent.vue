<template>
    <div>
        <hr class="mt-3">
        <ul class="list-group my-2">
            <h3>Lista de partidos</h3>
            <li class="list-group-item"
            v-for="(item, index) in partidos" :key="index" > 
                <table class="table">
                    <thead >
                        <tr>
                            <th scope="col" colspan="3">
                                <p>{{ item.etapa_face }}</p>
                            </th>
                        </tr>
                        <tr>
                            <td colspan="3">
                            <!-- comienza edicion -->
                                <form v-on:submit.prevent="modficaApuesta(pronostico)" 
                                v-if="editarActivo && item.partidos_id === pronostico.nuevo_id_partido && item.score_equipo_visitante !== null" >
                                    <input type="hidden" class="form-control" name="id_partido"
                                        v-model="pronostico.nuevo_id_partido" >
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="col-13">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm" >Score Local:</span>
                                                </div>
                                                <div class="col-2">
                                                <input type="text" aria-label="Small"
                                                        v-model="pronostico.nuevo_score_equipo_local" size=2>
                                                </div>
                                            </td>
                                            <td>
                                        <div class="col-13">
                                            <span class="input-group-text" id="inputGroup-sizing-sm" >Score Visita:</span>
                                        </div>
                                        <div class="col-2">
                                            <input type="text" 
                                            v-model="pronostico.nuevo_score_equipo_visitante"
                                            
                                            size=2>
                                        </div>
                                    </td>
                                    </tr>
                                    </table>
                                    <button class="btn btn-primary" type="submit">Modificar pronostico</button>
                                    <button class="btn btn-danger btn-sm"
                                    v-on:click="modificarFormulario(item)">Cancelar</button>
                                </form>
                                <!-- termina edicion -->
                            </td>
                        </tr>
                        <!-- <tr> -->
                            <!-- <th scope="col">{{ item.equipo_local.pais }}</th> -->
                            <!-- <td scope="col">  -->
                                <!-- {{ item.score_equipo_visitante }} -->
                            <!-- </td> -->
                            <!-- <th scope="col">{{ item.equipo_visitante.pais }}</th> -->
                            <!-- <th scope="col">Handle</th> -->
                        <!-- </tr> -->
                    </thead>
                    <tbody>
                        <tr>
                        <td scope="row">
                            {{item.score_equipo_local}}
                            <img v-bind:src="'/images/flags/' + item.equipo_local.pais+'.svg'"
                                :alt="item['etapa_face']" class="img-thumbnail" 
                                style="height: 4vw; border: 2px solid #fff;box-shadow: 0 0 5px gray;display: inline-block;margin-left: auto;margin-right: auto;">
                                <br>{{item.equipo_local.pais}}
                        </td>
                        <td>vs</td>
                        <td>{{item.score_equipo_visitante}}
                            <img v-bind:src="'/images/flags/' + item.equipo_visitante.pais+'.svg'"
                                :alt="item['etapa_face']" class="img-thumbnail" 
                                style="height: 4vw; border: 2px solid #fff;box-shadow: 0 0 5px gray;display: inline-block;margin-left: auto;margin-right: auto;">
                                <br>{{item.equipo_visitante.pais}}
                        </td>
                        </tr>
                    </tbody>
                </table>
                <form v-on:submit.prevent="nuevoScore(item)" v-if="editarActivo && item.partidos_id === pronostico.nuevo_id_partido && item.score_equipo_visitante === null" >
                        <input type="hidden" class="form-control" name="id_partido"
                            v-model="pronostico.nuevo_id_partido" >
                            <table>
                                <tr>
                                    <td>
                                        <div class="col-13">
                                            <span class="input-group-text" id="inputGroup-sizing-sm" >Score Local:</span>
                                        </div>
                                    
                                        <div class="col-2">
                                        <input type="text" aria-label="Small"
                                                v-model="pronostico.nuevo_score_equipo_local" size=2>
                                        </div>
                                    </td>
                                    <td>
                                <div class="col-13">
                                    <span class="input-group-text" id="inputGroup-sizing-sm" >Score Visita:</span>
                                </div>
                                <div class="col-2">
                                    <!-- class="form-control" 
                                    aria-label="Small"
                                    aria-describedby="inputGroup-sizing-sm"  -->
                                    <input type="text" 
                                    
                                    v-model="pronostico.nuevo_score_equipo_visitante" 
                                    size=2>
                                </div>
                            </td>
                            </tr>
                            </table>
                    
                    <button class="btn btn-primary" type="submit" >Adicionar pronostico</button>
                    <button class="btn btn-danger btn-sm" v-on:click="editarFormulario(item)">Cancelar</button>
                </form>
                
                <p>{{ item.hora_inicio }}</p>
                <!-- <p>cambia esto local {{ item.score_equipo_local }}</p> -->
                <button class="btn btn-success"
                v-on:click="editarFormulario(item)" v-if="item.activo && item.score_equipo_visitante === null" >Realizar score</button>
                <button class="btn btn-success"
                v-on:click="editarFormulario(item)" v-if="item.activo && item.score_equipo_visitante !== null" >Modificar score</button>
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
            partidos : [],
            pronostico : {
                nuevo_pais_local : '',
                nuevo_pais_visitante :'',
                nuevo_id_grupo : '',
                nuevo_id_partido : '',
                nuevo_id_usuario : '',
                nuevo_id_equipo_local : '',
                nuevo_score_equipo_local : '',
                nuevo_id_equipo_visitante : '',
                nuevo_score_equipo_visitante : ''
            },
            editarActivo: false,
            }
        },
        created(){
            axios.get('/partidos')
            .then(res => {
                this.partidos = res.data;
            })
        }
        ,
        methods:{
            editarFormulario(item){
                    this.editarActivo = !this.editarActivo;
                    this.pronostico.nuevo_id_partido = item.partidos_id;
                    // alert(item.id);
                    this.pronostico.nuevo_score_equipo_local=item.score_equipo_local;
                    this.pronostico.nuevo_score_equipo_visitante=item.score_equipo_visitante;
                    // this.equipo.pais = item.pais;
                    // this.equipo.id = item.id;
                }
                ,
            nuevoScore(item) {
                const params = {
                     nuevo_id_partido : this.pronostico.nuevo_id_partido,//item.id,
                     nuevo_score_equipo_visitante: this.pronostico.nuevo_score_equipo_visitante,
                     nuevo_score_equipo_local: this.pronostico.nuevo_score_equipo_local,
                    };
                    //console.log(params); 
                    this.editarActivo = !this.editarActivo;
                    this.pronostico.nuevo_score_equipo_visitante = '';
                    this.pronostico.nuevo_score_equipo_local = '';
                axios.post('/partidos',params)
                        .then(res => {
                            const index = this.partidos.findIndex(
                            partidoBuscar => partidoBuscar.id_partido  === res.data.id_partido 
                             //this.equipos.push(res.data)
                            // this.item.score_equipo_local = 
                          )
                        //   console.log(res);
                        //   console.log(index);
                        //   console.log(item.score_equipo_local);
                        // this.partidos[index].score_equipo_local = 1
                        item.score_equipo_local=res.data.score_equipo_local
                        item.score_equipo_visitante=res.data.score_equipo_visitante
                         //this.partidos.score_equipo_local ='';
                             //this.equipos.push(res.data)
                            // this.item.score_equipo_local = 
                         })
                         
                        //  this.partidos[index].score_equipo_visitante=res.data.score_equipo_visitante
                 },
            modficaApuesta(item){
                this.editarActivo = !this.editarActivo;
                //this.pronostico.nuevo_id_partido = item.id;
                    //     // this.equipo.pais = item.pais;
                    //     // this.equipo.id = item.id;
                const params = {
                    id_partido : this.pronostico.nuevo_id_partido,// item.id,
                    score_equipo_visitante : this.pronostico.nuevo_score_equipo_visitante,
                    score_equipo_local : this.pronostico.nuevo_score_equipo_local,
                };
                // console.log(params); 
                // console.log(this.pronostico.nuevo_id_partido); 
                // console.log(this.pronostico.nuevo_id_partido); 
                    axios.put(`/partidos/${item.id}`,params)
                        .then(res => {
                            const index = this.partidos.findIndex(
                            partidoBuscar => partidoBuscar.id_partido  === res.data.id_partido 
                        //  const index = this.equipos.findIndex(
                        //          equipoBuscar => equipoBuscar.id === res.data.id
                        //      )
                    //         // this.equipos[index]=res.data;
                            // //  this.equipos[index].pais=res.data.pais

                            // //  this.equipo.pais='';
                    //         // this.equipos[index].descripcion=res.data.descripcion
                            )
                            this.partidos[index].score_equipo_local=res.data.score_equipo_local
                            this.partidos[index].score_equipo_visitante=res.data.score_equipo_visitante
                    // item.score_equipo_visitante=res.data.score_equipo_visitante

                    // this.pronostico.nuevo_score_equipo_local = res.data.score_equipo_local;
                    // this.pronostico.nuevo_score_equipo_visitante= res.data.score_equipo_visitante;
                        })
            }

        }
        // ,
        // mounted() {
        //     console.log('Component mounted.')
        // }
    }
</script>
