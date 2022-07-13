<template>
    <div class="container">
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
    data(){
        return {
             menuItem: [
        		{
					label: 'Home',
					routeName: 'home'
				},
				{
					label: 'Posts',
					routeName: 'posts'
				},
				{
					label: 'Chi Siamo',
					routeName: 'about'
				},
				{
					label: 'Contatti',
					routeName: 'contact'
				}
            ]
        }
    }


}
</script>
<style lang="scss">
.container{
    margin: 0 auto;
    background-color: #69DC9E;
    #bottom{
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
