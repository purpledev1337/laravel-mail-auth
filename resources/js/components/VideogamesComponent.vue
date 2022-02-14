<template>
    <div>
        <h1>Videogames List:</h1>
        <div id="videogames_list">
            <div class="videogame" v-for="videogame in videogames" :key="videogame.id">
                <h2>
                    {{ videogame.title }}
                </h2>
                <h4>
                    {{ videogame.subtitle }}
                </h4>
                <h3>
                    Rating: {{ videogame.rating }}
                </h3>
                <hr>
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
        mounted() {
            
            axios.get('/api/videogames/list')
                 .then(r => this.videogames = r.data)
                 .catch(e => console.error(e));
        }
    }
</script>
