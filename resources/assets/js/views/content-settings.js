module.exports = {
  template: require('./content-settings.template.html'),
  props: ['params'],

  data: function () {
    return {
      params: {
        currentView: '',
        contentId: '',
        contents: '',
        filename: ''
      },
      newContent: {
        title: '',
        slug: '',
        description: '',
        primary_image: null,
        featured: false,
        published: false
      }
    }
  },

  components: {
    navbar: require('../components/navbar')
  },

  methods: {
    submitContent: function(e) {
      e.preventDefault()
      // set new content
      this.newContent.title = this.params.contents.response.title
      this.newContent.slug = this.params.contents.response.slug
      this.newContent.description = this.params.contents.response.description
      this.newContent.primary_image = this.params.contents.response.primary_image
      this.newContent.featured = this.params.contents.response.featured
      this.newContent.published = this.params.contents.response.published

      this.$http.put('admin/api/content/'+this.params.contentId, this.newContent, function (data, status, request) {
        window.location.href = '#/content/'+data
      }).error(function (data, status, request) {
        //console.log(data)
      })
    }
  }
}