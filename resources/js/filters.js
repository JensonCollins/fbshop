import numeral from 'numeral'

export default {
  currency (value) {
    if (!value || parseInt(value) === 0) return '-'
    return numeral(value).format('0,0') + 'P'
  }
}
