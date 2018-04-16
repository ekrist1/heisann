<template>
<div>
    <transition appear name="slide-fade">
        <slot></slot>
    </transition>
</div>
</template>

<script>
    export default {
        data () {
            return {

            }
        }
    }
</script>