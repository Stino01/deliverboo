<template>
    <header>
        <div class="container">
            <div id="top">
                <div id="left">
                    <img src="https://cdn.discordapp.com/attachments/941312490950766592/996354486467571802/TEq98Yg.png">
                    <h1>deliverboo</h1>
                </div>
                <div id="right"></div>
            </div>
        </div>


    </header>
</template>
<script>
export default {
    name: 'HeaderComponent',
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
header{
    margin: 0 auto;
    background-color: #042940;  /*BLUE */
    #top{
        #left{
            display: flex;
            flex-direction: row;
            align-items: center;
            vertical-align: middle;
            img{
                width: 50px;
            }
            h1{
                color: white;
                text-transform: uppercase;
                vertical-align: middle;
                margin: 0 !important;
            }
        }
    }
}

</style>
