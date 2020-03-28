<template>
    <div class="select-wrapper">
        <div class="text">
            <span>Pièces</span>
            <i class="arrow">&#752;</i>
            <i class="arrow">&#751;</i>
        </div>
        <div class="options">
            <div class="option">
                <input type="checkbox" value="All"> Tous
                <input type="checkbox" value="1"> 1
                <input type="checkbox" value="2"> 2
                <input type="checkbox" value="3"> 3
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                arrow: false,
                options: []
            }
        },

        methods: {

        }
    }
</script>

<style lang="scss" scoped>
    .select-wrapper {
        background: #fff;
        padding: .4rem;
    }

    .text {
        display: flex;
        justify-content: center;
        align-items: center;

        .arrow {
            font-size: 2.2rem;
        }
    }

    .options {
        display: flex;
    }
</style>
