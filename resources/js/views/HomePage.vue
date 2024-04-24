<template>
  <div>
    <main>
      <div class="container" id="projects">
        <section>
          <div class="__individual_projects">
            <h1 class="__individual_projects__text">Наши индивидуальные проекты</h1>
            <div class="__individual_projects__title_content_deliver">
              <h3>⩶⩶⩶⩶⩶</h3>
            </div>
            <h3 class="__individual_projects__text">Мы <span>ищем вдохновение</span> в ваших словах и мыслях для вложения их в
              наши чертежи и проекты.</h3>
          </div>
          <div class="__individual_projects__block-image">
            <img class="__individual_projects_image" src="/image/content-picture_2.jpg"
                 alt="Мебельный проект">
          </div>
          <div class="__individual_projects">
            <h3 class="__individual_projects__text">Собираем множество концепций и выделяем самые <span>интересные детали.</span></h3>
          </div>
          <div class="mt-5">
            <img class="__individual_projects_image" src="/image/content-picture_3.jpg"
                 alt="Мебельный проект">
          </div>
        </section>
      </div>

      <div id="production" class="__about_production-content_block">
        <div class="__about_production-content_block-first">
          <h1>Собственное<br>производство</h1>
          <p>Наше производство оснащено лучшим оборудованием для производства детской мебели.</p>
        </div>
        <div class="__about_production-content_block-second">
          <h3>Производство ручной работы</h3>
        </div>
      </div>

      <div class="container" id="recommendations">
        <section>
          <div class="__recommendations_content">
            <div class="__recommendations_content-main-block">
              <p class="__recommendations_content_block-title">Мы гарантируем</p>
              <p class="__recommendations_content_block-description">Исполнение желаний, а так же:</p>
              <div class="__recommendations_content_blocks">
                <div>
                  <img src="/image/svg/chat.svg" alt="">
                  <p class="__recommendations_content_blocks-title">Помощь клиентам</p>
                  <p class="__recommendations_content_blocks-description">Поможем разобраться и подобрать
                    мебель, цвета, а также нарисуем дизайн проект.</p>
                </div>
                <div>
                  <img src="/image/svg/award-fill.svg" alt="">
                  <p class="__recommendations_content_blocks-title">Высокое качество</p>
                  <p class="__recommendations_content_blocks-description">Создаем и реализовываем проекты
                    и мебель только высокого и лучшего качества.</p>
                </div>
                <div>
                  <img src="/image/svg/eco.svg" alt="">
                  <p class="__recommendations_content_blocks-title">Эко-материалы</p>
                  <p class="__recommendations_content_blocks-description">Производим мебель и проекты из
                    экологически чистых и качественных материалов.</p>
                </div>
                <div>
                  <img src="/image/svg/idea.svg" alt="">
                  <p class="__recommendations_content_blocks-title">Любая сложность</p>
                  <p class="__recommendations_content_blocks-description">Гарантируем, что произведем и
                    спроектируем мебель и ваши проекты любой сложности.</p>
                </div>
              </div>
            </div>
            <div>
              <p class="__recommendations_content-title">Мы работаем с 2014 года более <br><span>{{ counterWorks }}</span><br>выполненных работ</p>
            </div>
          </div>
        </section>
      </div>
    </main>
  </div>
</template>

<script>
export default {
  data(){
    return {
      counterWorks: 0,
    }
  },
  created() {
    const intervalId = setInterval(() => {
      if (this.counterWorks < 10000) {
        this.counterWorks++;
      } else {
        clearInterval(intervalId); // Остановить setInterval после достижения 10 000
      }
    }, 1);
  }
}
</script>
