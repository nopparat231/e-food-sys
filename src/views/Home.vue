<template>
  <h1>Home</h1>
    {{ message }}
  <div class="card-group">
  <Cards />
  </div>
</template>

<script>
import Cards from "../components/Cards";
import {onMounted, ref} from 'vue';
import {useStore} from "vuex";

export default {
  name: "Home",
  setup() {
    const message = ref('You are not logged in!');
    const store = useStore();

    onMounted(async () => {
      try {
        const response = await fetch('http://localhost/e-food-sys/api/user.php', {
          mode: "no-cors",
          headers: {'Content-Type': 'application/json'},
          credentials: 'include'
        });

        const content = await response.json();

        message.value = `Hi ${content.name}`;

        await store.dispatch('setAuth', true);
      } catch (e) {
        await store.dispatch('setAuth', false);
      }
    });

    return {
      message
    }
  },
  components: {
    Cards,
  },
};
</script>
