<template>
    <div>
        <h1 class="display-3">Videogames List:</h1>
        <br>
        <div id="videogames_list">
            <div class="videogame" v-for="videogame in videogames" :key="videogame.id">
                <span>id: {{ videogame.id }}</span>
                <h2>
                    {{ videogame.title }}
                </h2>
                <h4>
                    {{ videogame.subtitle }}
                </h4>
                <h3>
                    Rating: {{ videogame.rating }}
                </h3>
                <button v-if="user" class="btn btn-danger" @click="videogameDelete(videogame.id)">Delete</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {

            return {

                videogames: []
            };
        },
        props: {

            user: String
        },
        methods: {

            videogameDelete(id) {

                axios.get(`/api/videogames/delete/${id}`)
                     .then(r => {

                         const ind = this.getIndexById(id);
                         this.videogames.splice(ind, 1);
                     })
                     .catch(e => console.error('e', e));
            },
            getIndexById(id) {

                for (let x = 0; x < this.videogames.length; x++) {

                    const videogame = this.videogames[x];

                    if (videogame.id == id) {

                        return x
                    }
                }

                return -1;
            }
        },
        mounted() {
            
            axios.get('/api/videogames/list')
                 .then(r => this.videogames = r.data)
                 .catch(e => console.error(e));
        }
    }
</script>
<style lang="sass">

#videogames_list

    .videogame
    
        width: 50%
        margin: 15px auto
        padding: 10px 0
        border: 1px solid black

</style>