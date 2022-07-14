<template>
    <div class="container-slogan">
        <div id="bottom">
            <div id="left">
                <h1>i piatti che ami a domicilio</h1>
            </div>
            <div id="right">
                <img src="https://cdn.discordapp.com/attachments/941312490950766592/996357413194170438/campaign.df58721f.png">
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'SloganComponent',
}
</script>
<style lang="scss">
.container-slogan{
    background-color: #69DC9E;
    #bottom{
        width: 70%;
        margin: 0 auto;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        #left{
            h1{
                text-transform: uppercase;
                color: black;
                font-size: 46px;
                font-weight: 900;
            }
        }
        #right{
            display: flex;
            flex-direction: row-reverse;
            width: 30%;
            img{
                width: 100%;
                position: relative;
                bottom: -3vw;
            }
        }
    }

}

</style>
