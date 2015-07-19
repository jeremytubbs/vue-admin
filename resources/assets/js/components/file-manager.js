module.exports = {
  template: require('./file-manager.template.html'),

  props: ['params'],

  data: function () {
    return {
      params: {
        contentId: null
      },
      file: null
    }
  },

  methods: {
    submitFile: function(e) {
      e.preventDefault()
      var files = this.$$.upload.files
      console.log(files)
      var data = new FormData()
      data.append('file', files[0])
      // post file for upload
      this.$http.post('/admin/api/upload/'+this.params.contentId, data, function (data, status, request) {
        console.log(data)
      }).error(function (data, status, request) {
        console.log(data)
      })
    }
  }
}