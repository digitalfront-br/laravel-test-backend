<template>
    <ul class="uk-pagination uk-flex-center"  uk-margin>
        <li :class="{ 'uk-hidden': source.current_page == 1}" @click="navigate($event, source.current_page-1)">
            <a href="#"><span uk-pagination-previous></span></a>
        </li>
        <li v-for="(item, index) in pages" :key="index" :class="{ 'uk-active' : source.current_page == item }">
            <a href="#" @click="navigate($event, item)">{{ item }}</a>
        </li>
        <li  :class="{ 'uk-hidden': source.current_page == source.last_page}" @click="navigate($event, source.current_page+1)">
            <a href="#"><span uk-pagination-next></span></a>
        </li>
    </ul>
</template>

<script>
import { range } from "lodash"
export default {
    props: ['source'],
    data(){
        return {
            pages: []
        }
    },
    mounted(){
        console.log(this.source)
    },
    methods: {
        navigate(ev, page) {
            ev.preventDefault()
            this.$emit('navigate', page)
        }
    },
    watch: {
        source() {
            this.pages = range(1, this.source.last_page+1)
        }
    }
}
</script>