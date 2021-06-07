<template>
  <div class="container">
    <div class="row">
      <Nav />

      <router-view />
    </div>
  </div>
</template>

<script>
import Nav from "@/components/Nav";

export default {
  components: { Nav },
};
</script>
