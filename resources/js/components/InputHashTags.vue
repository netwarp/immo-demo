<template>
    <div class="form-group">
        <span v-for="(city, index) in cities" class="hash-tag">{{ city }}<i class="remove" @click="remove(index)">&times;</i></span>
        <input type="text" class="form-control" name="cities" @keydown.enter.prevent="add" v-model="city" placeholder="Villes">
    </div>
</template>

<script>
    export default {

        data() {
            return {
                city: '',
                cities: []
            }
        },

        methods: {
            add() {
                if (! this.city.length) {
                    return console.warn('The city is empty...')
                }

                if (this.cities.includes(this.city)) {
                    return console.warn('already inside...')
                }

                this.cities.push(this.city);
                this.city = '';
            },

            remove(index) {
                this.cities.splice(index, 1)
            }
        }
    }
</script>

<style lang="scss" scoped>

    .form-group {
        display: flex;
    }

    .hash-tag {
        background: #6cb2eb;
        color: #fff;
        margin-right: .4rem;
        padding: 0.4rem 0.6rem;
        border-radius: 4px;

        .remove {
            background: #333;
            padding: 0.1rem 0.4rem;
            border-radius: 50%;
            cursor: pointer;
            margin-left: .6rem;
        }
    }
</style>
