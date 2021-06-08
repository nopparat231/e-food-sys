<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <router-link to="/" class="navbar-brand">E-Foods</router-link>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarText"
        aria-controls="navbarText"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <router-link to="/" class="nav-link active" aria-current="page"
              >Home</router-link
            >
          </li>
          <li class="nav-item">
            <router-link to="/Order" class="nav-link" href="#"
              >Order</router-link
            >
          </li>
        </ul>
        <span class="nav-item">
          <button
            class="btn float-end nav-link"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvas"
            role="button"
          >
            <i
              class="bi bi-gear-fill"
              data-bs-toggle="offcanvas"
              data-bs-target="#offcanvas"
            ></i>
          </button>
        </span>
              <span class="nav-item">
          <button
            class="btn float-end nav-link"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasOrder"
            role="button"
          >
            <i
              class="bi bi-basket2-fill"
              data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasOrder"
            ></i>
          </button>
        </span>
        <span class="nav-item">
          <router-link to="/Register" class="nav-link">Register</router-link>
        </span>
        <span class="nav-item">
          <router-link to="/Login" class="nav-link">Login</router-link>
        </span>
      </div>
    </div>
  </nav>
  <Sidebar />
  <SidebarOrder />
</template>

<script>
import Sidebar from "../components/Sidebar.vue";
import SidebarOrder from "../components/SidebarOrder.vue";

import {computed} from 'vue';
import {useStore} from "vuex";

export default {
  name: "Nav",
    setup() {
    const store = useStore();

    const auth = computed(() => store.state.authenticated)

    const logout = async () => {
      await fetch('http://localhost:8000/api/logout', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        credentials: 'include',
      });
    }

    return {
      auth,
      logout
    }
  },
  components: {
    Sidebar,
    SidebarOrder,
  },
};
</script>
