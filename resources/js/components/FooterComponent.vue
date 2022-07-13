<template>
  <footer>
    <div id="blocks">
      <div class="block">
        <ul>
          <li>Scopri Deliveroo</li>
          <li>investitori</li>
          <li>chi siamo</li>
          <li>ristoranti</li>
          <li>altro</li>
          <li>pressroom</li>
          <li>il nostro blog</li>
          <li>programmazione</li>
          <li>design</li>
          <li>lavora con noi</li>
          <li>diventa nostro partner</li>
        </ul>
      </div>
      <div class="block">
        <ul>
          <li>Note legali</li>
          <li>termini & Condizioni</li>
          <li>informativa sulla privacy</li>
          <li>cookies</li>
        </ul>
      </div>
      <div class="block">
        <ul>
          <li>Aiuto</li>
          <li>contatti</li>
          <li>FAQ</li>
          <li>tipi di cucina</li>
        </ul>
      </div>
      <div class="block">
        <ul>
          <li>Porta Deliverboo con te</li>
          <li><img src="https://cdn.discordapp.com/attachments/941312490950766592/996772132816162946/appstore.png"></li>
          <li><img src="https://cdn.discordapp.com/attachments/941312490950766592/996772133004922951/playstore.png"></li>
        </ul>
      </div>
    </div>
    <div id="underFooter">
      <div id="left">
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-instagram"></i>
      </div>
      <div id="right">
        <p><i class="fa-solid fa-copyright"></i> 2022 Deliverboo</p>
      </div>
    </div>

  </footer>
</template>

<script>
export default {
  name: "FooterComponent",
};
</script>

<style lang="scss">
footer{
  padding: 0 15%;
  margin: 0 auto;
  background-color: #73818C;
  #blocks{
  display: flex;
  justify-content: space-between;
  .block{
    background-color: #8C7E73;
    width: 23%;
    margin: 40px 0;
    border-radius: 10px;
    padding: 10px;
    ul{
      list-style-type: none;
      padding: 0 !important;
      :first-child{
        font-size: 1.5rem;
        font-weight: 800;
        margin-bottom: 5px;
      }
      li{
        color: white;

      }
    }
  }
  }
  #underFooter{
    display: flex;
    justify-content: space-between;
    padding: 20px 0;
    #left, #right{
      display: flex;
      flex-direction: row;
      align-items: center;
    }
    #left{
      display: flex;
      gap: 10px;
      i{
        font-size: 30px;
        color: white;
      }
    }
    #right{
      color: #bdbdbd;
    }
  }
}
</style>