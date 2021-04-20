export default {
  methods: {
    onFileChange (name, files) {
      if (files) {
        const fd = new FormData()
        fd.append('file', files[0])
        window.axios.post(
          '/file_upload/',
          fd,
          {
            headers: {
              'Content-Type': 'application/json'
            }
          }
        )
          .then((res) => {
            const data = res.data
            const val = data.url
            if (val) {
              this.form[name] = val
            }
          })
          .catch(function (error) {
            console.log(error)
          })
      }
    },

    resetImage (name) {
      if (confirm('画像を削除しますか？')) {
        this.form[name] = null
        document.getElementById(name).value = ''
      }
    }
  }
}
