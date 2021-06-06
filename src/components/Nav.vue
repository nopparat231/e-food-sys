<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
            <router-link to="/" class="nav-link active" aria-current="page">Home</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/Order" class="nav-link" href="#">Order</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/" class="nav-link" href="#">Pricing</router-link>
          </li>
        </ul>
        <span class="nav-item">
           <router-link to="/Regis" class="nav-link" >Register</router-link>
        </span>
          <span class="nav-item">
           <router-link to="/Login" class="nav-link" >Login</router-link>
        </span>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Nav",
};
</script>
